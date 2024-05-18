export class CardCard extends HTMLElement {
  constructor() {
    super();
    this.toggleImage = this.toggleImage.bind(this);
  }

  connectedCallback() {
    const card = document.createElement("img");
    card.src = "../img/question.png";
    card.setAttribute("id", "hi");
    card.addEventListener("click", this.toggleImage);
    this.appendChild(card);
  }

  toggleImage() {
    const card = this.querySelector("img");
    if (card.src.includes("question.png")) {
      card.src = "../img/start.png";
    } else {
      card.src = "../img/question.png";
    }
  }
}

customElements.define("card-card", CardCard);
