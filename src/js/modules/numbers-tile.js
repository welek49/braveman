/*
*
* Script for numbers tile block
*
*/

export const numbersTileCounter = () => {
    const counters = Array.from(document.querySelectorAll('.numbers-tile__number'));

    if (counters) {
        counters.forEach(counter => {

            const counterValue = parseInt(counter.dataset.number);

            const startCounting = () => {
                let count = 0;

                const countingInterval = setInterval(() => {
                    if (count < counterValue) {
                        count++;
                        counter.textContent = count;
                    } else {
                        clearInterval(countingInterval);
                    }
                }, 100);
            };

            const observer = new IntersectionObserver(entries => {
                if (entries[0].isIntersecting) {
                    startCounting();
                    observer.disconnect();
                }
            });

            observer.observe(counter);

        });
    }
}