import * as THREE from 'three';

export function initHero3D(canvasId) {
    const canvas = document.getElementById(canvasId);
    if (!canvas) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, 1, 0.1, 100);
    camera.position.z = 6;

    const group = new THREE.Group();
    scene.add(group);

    const isDark = document.documentElement.classList.contains('dark');
    const lineColor = isDark ? 0x818cf8 : 0x4f46e5;
    const fillColor = isDark ? 0x6366f1 : 0x4338ca;
    const particleColor = isDark ? 0xa5b4fc : 0x4f46e5;

    const geometry = new THREE.IcosahedronGeometry(2, 1);

    const fill = new THREE.Mesh(
        geometry,
        new THREE.MeshBasicMaterial({ color: fillColor, transparent: true, opacity: isDark ? 0.12 : 0.16, side: THREE.BackSide })
    );
    group.add(fill);

    const wireframe = new THREE.LineSegments(
        new THREE.WireframeGeometry(geometry),
        new THREE.LineBasicMaterial({ color: lineColor, transparent: true, opacity: isDark ? 0.95 : 0.75 })
    );
    group.add(wireframe);

    const outerWireframe = new THREE.LineSegments(
        new THREE.WireframeGeometry(new THREE.IcosahedronGeometry(2.35, 1)),
        new THREE.LineBasicMaterial({ color: lineColor, transparent: true, opacity: isDark ? 0.25 : 0.15 })
    );
    group.add(outerWireframe);

    const particleCount = 300;
    const positions = new Float32Array(particleCount * 3);
    for (let i = 0; i < particleCount; i++) {
        positions[i * 3] = (Math.random() - 0.5) * 14;
        positions[i * 3 + 1] = (Math.random() - 0.5) * 14;
        positions[i * 3 + 2] = (Math.random() - 0.5) * 14;
    }
    const particlesGeometry = new THREE.BufferGeometry();
    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    const particles = new THREE.Points(
        particlesGeometry,
        new THREE.PointsMaterial({ color: particleColor, size: 0.035, transparent: true, opacity: isDark ? 0.85 : 0.6 })
    );
    scene.add(particles);

    const observer = new MutationObserver(() => {
        const dark = document.documentElement.classList.contains('dark');
        fill.material.color.set(dark ? 0x6366f1 : 0x4338ca);
        fill.material.opacity = dark ? 0.12 : 0.16;
        wireframe.material.color.set(dark ? 0x818cf8 : 0x4f46e5);
        wireframe.material.opacity = dark ? 0.95 : 0.75;
        outerWireframe.material.color.set(dark ? 0x818cf8 : 0x4f46e5);
        outerWireframe.material.opacity = dark ? 0.25 : 0.15;
        particles.material.color.set(dark ? 0xa5b4fc : 0x4f46e5);
        particles.material.opacity = dark ? 0.85 : 0.6;
    });
    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });

    let mouseX = 0;
    let mouseY = 0;
    window.addEventListener('mousemove', (e) => {
        mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
        mouseY = (e.clientY / window.innerHeight - 0.5) * 2;
    });

    function resize() {
        const { clientWidth, clientHeight } = canvas.parentElement;
        renderer.setSize(clientWidth, clientHeight, false);
        camera.aspect = clientWidth / clientHeight;
        camera.updateProjectionMatrix();
    }
    resize();
    window.addEventListener('resize', resize);

    function animate() {
        group.rotation.y += 0.002;
        group.rotation.x += 0.0008;
        particles.rotation.y -= 0.0006;

        camera.position.x += (mouseX * 1.2 - camera.position.x) * 0.03;
        camera.position.y += (-mouseY * 1.2 - camera.position.y) * 0.03;
        camera.lookAt(0, 0, 0);

        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    }
    animate();
}
