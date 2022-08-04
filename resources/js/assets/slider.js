export  class Slider {
    constructor(id, mediaQueries) {
      // Get HTML elements
      this.slider = document.querySelector(`#${id}`);
      this.sliderList = this.slider.querySelector(".slider-list");
      this.sliderItems = this.slider.querySelectorAll(".slider-item");
      this.sliderNext = this.slider.querySelector(".slider-arrow-next");
      this.sliderPrev = this.slider.querySelector(".slider-arrow-prev");

      // Get media queries
      this.mediaQueryList = [
        window.matchMedia(`screen and (max-width:${mediaQueries[0] - 1}px)`)
      ];
      mediaQueries.forEach((mediaQuery) => {
        this.mediaQueryList.push(
          window.matchMedia(`screen and (min-width:${mediaQuery}px)`)
        );
      });

      // Define global variables
      this.numberOfVisibleItems;
      this.currentItemIndex;
      this.sliderItemsLength = this.sliderItems.length;
      this.mediaQueryLength = this.mediaQueryList.length;

      // Add event listener: to call the run function again when screen resized
      this.mediaQueryList.forEach((mediaQuery) => {
        mediaQuery.addEventListener("change", () => {
          this.run();
        });
      });

      // Add event listener: to go to next slide
      this.sliderNext.addEventListener("click", () => {
        if (
          this.currentItemIndex <
          this.sliderItemsLength - this.numberOfVisibleItems
        ) {
          this.currentItemIndex++;
          this.shiftSlides();
        }
      });

      // Add event listener: to go to previous slide
      this.sliderPrev.addEventListener("click", () => {
        if (this.currentItemIndex > 0) {
          this.currentItemIndex--;
          this.shiftSlides();
        }
      });
    }

    // Run the slider
    run() {
      let index = this.mediaQueryLength - 1;
      while (index >= 0) {
        if (this.mediaQueryList[index].matches) {
          // Set number of visible slides
          this.numberOfVisibleItems = index + 1;

          // Reset the slider
          this.currentItemIndex = 0;
          this.sliderList.style.transform = "translateX(0)";

          // Set slider list width
          this.sliderList.style.width = `calc(${
            (100 / this.numberOfVisibleItems) * this.sliderItemsLength
          }% + ${(this.sliderItemsLength / this.numberOfVisibleItems) * 16}px)`;

          // Set slides width
          this.sliderItems.forEach((item) => {
            item.style.width = `${(100 / this.numberOfVisibleItems)}%`;
          });

          // Exit the loop
          break;
        }
        index--;
      }
    }

    // A function to shift slides left and right
    shiftSlides() {
      this.sliderList.style.transform = `translateX(-${
        (100 / this.sliderItemsLength) * this.currentItemIndex
      }%`;
    }
}
export class Slider2{
    constructor(){
        console.log("slider2")

    }
    

}