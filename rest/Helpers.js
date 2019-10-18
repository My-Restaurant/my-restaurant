export class Helper{

    constructor(){

        Element.prototype.hide = function(){
            this.style.display = "none";
            return this;
        }

        Element.prototype.show = function(){
            this.style.display = "block";
            return this;
        }

        Element.prototype.toggle = function(){
            this.style.display = (this.style.display === "none") ? "block" : "none";
            return this;
        }

        Element.prototype.addClass = function(cl){
            this.classList.add(cl);
            return this;
        }

        Element.prototype.removeClass = function(cl){
            this.classList.remove(cl);
            return this;
        }

        Element.prototype.toggleClass = function(cl){
            this.classList.toggle(cl);
            return this;
        }

        Element.prototype.hasClass = function(cl){
            return this.classList.contains(cl);
        }

    }

}