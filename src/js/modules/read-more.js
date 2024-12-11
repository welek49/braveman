/*
 *
 * Script for read more
 *
 */

export const readMore = () => {
    const readMoreElements = document.querySelectorAll(".read-more");

    if (readMoreElements.length > 0) {
        readMoreElements.forEach(function (element) {
            const initialHeight = element.classList.contains("read-more") ? `${heightReadMore}px` : "25px";
            element.style.maxHeight = initialHeight;
            element.style.overflow = "hidden";
            element.style.transition = "max-height 0.5s ease";

            const label = document.createElement("span");
            label.classList.add("read-more__label");
            label.textContent = labelReadMore;
            element.appendChild(label);

            function toggleElement() {
                const isCollapsed = element.style.maxHeight === initialHeight;

                if (isCollapsed) {
                    element.style.maxHeight = element.scrollHeight + "px";
                    label.style.display = "none";
                } else {
                    element.style.maxHeight = initialHeight;
                    label.style.display = "block";
                }
            }

            element.addEventListener("click", toggleElement);
            label.addEventListener("click", function (event) {
                event.stopPropagation();
                toggleElement();
            });
        });
    }
};
