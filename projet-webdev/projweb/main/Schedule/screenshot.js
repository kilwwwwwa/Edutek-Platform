const container = document.querySelector(".schedule__container");
const captureButton = document.getElementById("capture-button");
const downloadButton = document.getElementById("download-button");
const downloadButtonBtn=document.getElementById("down-button");

captureButton.addEventListener("click", async () => {
  downloadButton.classList.remove("hide");
  downloadButtonBtn.classList.remove("hide");
  const canvas = await html2canvas(container);
  const imageURL = canvas.toDataURL();
  downloadButton.href = imageURL;
  downloadButton.download = "image.png";
});

window.onload = () => {
  downloadButton.classList.add("hide");
  downloadButtonBtn.classList.add("hide");
};
