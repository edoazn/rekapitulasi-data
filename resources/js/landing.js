document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu Toggle
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        // Close mobile menu when a link is clicked
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // Scroll Animation Function
    const addScrollAnimation = () => {
        const elements = document.querySelectorAll('.scroll-animate');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    // Optional: remove observer after animation
                    // observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px'
        });

        elements.forEach(element => {
            observer.observe(element);
        });
    };

    // Hero Background Scroll Effect
    const heroBgImage = document.getElementById('hero-bg-image');
    if (heroBgImage) {
        window.addEventListener('scroll', () => {
            const scrollPosition = window.pageYOffset;
            const fadeStart = 50;
            const fadeUntil = 400; // Image fully faded by 400px scroll
            let opacity = 1;

            if (scrollPosition > fadeStart) {
                opacity = 1 - (scrollPosition - fadeStart) / (fadeUntil - fadeStart);
            }
            opacity = Math.max(0, Math.min(1, opacity));
            heroBgImage.style.opacity = opacity;
        });
    }

    // Animated Statistics Counter
    const animatedStats = [
        { id: 'statTotalLayanan', target: 12345, suffix: '' },
        { id: 'statLayananSelesai', target: 10987, suffix: '' },
        { id: 'statKepuasan', target: 92, suffix: '%' }
    ];

    const animateValue = (element, start, end, duration, suffix) => {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            element.innerHTML = Math.floor(progress * (end - start) + start).toLocaleString() + suffix;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    };

    const statSection = document.getElementById('statistik');
    if (statSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animatedStats.forEach(stat => {
                        const el = document.getElementById(stat.id);
                        if (el && !el.dataset.animated) { // Check if already animated
                            el.dataset.animated = "true"; // Mark as animated
                            animateValue(el, 0, stat.target, 2000, stat.suffix);
                        }
                    });
                    // Optional: unobserve after animation to save resources
                    // observer.unobserve(statSection); 
                }
            });
        }, { threshold: 0.5 }); // Trigger when 50% of the section is visible

        observer.observe(statSection);
    }

    // Navbar Scroll Effect
    const mainHeader = document.getElementById('main-header');
    if (mainHeader) {
        const scrollThreshold = 50; // Pixels to scroll before navbar changes
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > scrollThreshold) {
                mainHeader.classList.add('scrolled');
            } else {
                mainHeader.classList.remove('scrolled');
            }
        });
    }

    // Initialize scroll animations
    addScrollAnimation();
});
