document.addEventListener("DOMContentLoaded", function () {
    let videos = document.querySelectorAll("video[data-src]");

    if ("IntersectionObserver" in window) {
        let observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    let video = entry.target;
                    let source = video.querySelector("source");

                    if (video.dataset.src) {
                        video.src = video.dataset.src;
                        video.removeAttribute("data-src");
                    }
                    if (source && source.dataset.src) {
                        source.src = source.dataset.src;
                        source.removeAttribute("data-src");
                    }
                    video.load(); // Start loading the video
                    observer.unobserve(video);
                }
            });
        });

        videos.forEach(video => observer.observe(video));
    } else {
        // Simple Fallback for older browsers (IE11 and below)
        videos.forEach(video => {
            let source = video.querySelector("source");

            if (video.dataset.src) {
                video.src = video.dataset.src;
                video.removeAttribute("data-src");
            }
            if (source && source.dataset.src) {
                source.src = source.dataset.src;
                source.removeAttribute("data-src");
            }
            video.load();
        });
    }
});
