/*
 *
 * Script for read more
 *
 */

export const readMore = () => {
    const readMoreElements = document.querySelectorAll(".read-more");

    if (readMoreElements.length > 0) {
        readMoreElements.forEach(function (readMoreElement) {
            const contentElement = readMoreElement.querySelector(
                ".read-more__content"
            );
            const initialHeight = `${heightReadMore}px`;
            contentElement.style.maxHeight = initialHeight;
            contentElement.style.transition = "max-height 0.5s ease";

            const label = document.createElement("span");
            label.classList.add("read-more__label");
            label.textContent = labelReadMore;
            readMoreElement.appendChild(label);

            function toggleElement() {
                const isCollapsed =
                    contentElement.style.maxHeight === initialHeight;

                if (isCollapsed) {
                    contentElement.style.maxHeight =
                        contentElement.scrollHeight + "px";
                    label.textContent = labelReadLess;
                    label.classList.add("expanded");
                } else {
                    contentElement.style.maxHeight = initialHeight;
                    label.textContent = labelReadMore;
                    label.classList.remove("expanded");
                }
            }

            label.addEventListener("click", function (event) {
                event.stopPropagation();
                toggleElement();
            });
        });
    }
};
