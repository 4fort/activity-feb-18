import "./bootstrap";
import Alpine from "alpinejs";
import datePicker from "./datepicker";

window.Alpine = Alpine;

Alpine.data("datePicker", datePicker);

Alpine.start();
