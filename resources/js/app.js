import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initHero3D } from './hero3d';
import { initAbout3D } from './about3d';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
Alpine.start();

window.toggleTheme = () => {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.theme = isDark ? 'dark' : 'light';
};

document.addEventListener('DOMContentLoaded', () => {
    initHero3D('hero-canvas');
    initAbout3D('about-canvas');

    gsap.utils.toArray('.reveal').forEach((el, i) => {
        gsap.from(el, {
            opacity: 0,
            y: 24,
            duration: 0.6,
            delay: (i % 6) * 0.05,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
            },
        });
    });
});
