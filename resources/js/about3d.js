import * as THREE from 'three';

export function initAbout3D(canvasId) {
    const canvas = document.getElementById(canvasId);
    if (!canvas) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, 1, 0.1, 100);
    camera.position.z = 6;

    const isDark = document.documentElement.classList.contains('dark');
    const ringColor = isDark ? 0xf59e0b : 0xd97706;
    const particleColor = isDark ? 0xfcd34d : 0xf59e0b;

    const ringGroup = new THREE.Group();
    scene.add(ringGroup);

    const rings = [];
    for (let i = 0; i < 3; i++) {
        const torus = new THREE.LineSegments(
            new THREE.WireframeGeometry(new THREE.TorusGeometry(2 + i * 0.4, 0.015, 8, 64)),
            new THREE.LineBasicMaterial({ color: ringColor, transparent: true, opacity: 0.5 - i * 0.12 })
        );
        torus.rotation.x = Math.PI / 2.3 + i * 0.4;
        torus.rotation.y = i * 0.6;
        ringGroup.add(torus);
        rings.push(torus);
    }

    const particleCount = 150;
    const positions = new Float32Array(particleCount * 3);
    for (let i = 0; i < particleCount; i++) {
        const radius = 2.5 + Math.random() * 2;
        const angle = Math.random() * Math.PI * 2;
        const height = (Math.random() - 0.5) * 6;
        positions[i * 3] = Math.cos(angle) * radius;
        positions[i * 3 + 1] = height;
        positions[i * 3 + 2] = Math.sin(angle) * radius;
    }
    const particlesGeometry = new THREE.BufferGeometry();
    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    const particles = new THREE.Points(
        particlesGeometry,
        new THREE.PointsMaterial({ color: particleColor, size: 0.04, transparent: true, opacity: isDark ? 0.8 : 0.55 })
    );
    scene.add(particles);

    const observer = new MutationObserver(() => {
        const dark = document.documentElement.classList.contains('dark');
        rings.forEach((ring) => ring.material.color.set(dark ? 0xf59e0b : 0xd97706));
        particles.material.color.set(dark ? 0xfcd34d : 0xf59e0b);
        particles.material.opacity = dark ? 0.8 : 0.55;
    });
    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });

    function resize() {
        const { clientWidth, clientHeight } = canvas.parentElement;
        renderer.setSize(clientWidth, clientHeight, false);
        camera.aspect = clientWidth / clientHeight;
        camera.updateProjectionMatrix();
    }
    resize();
    window.addEventListener('resize', resize);

    function animate() {
        ringGroup.rotation.y += 0.0025;
        ringGroup.rotation.z += 0.001;
        particles.rotation.y -= 0.001;

        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    }
    animate();
}
