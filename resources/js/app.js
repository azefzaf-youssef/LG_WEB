import './bootstrap';
import Swal from 'sweetalert2';
import { Modal } from 'bootstrap';
window.Swal = Swal; // Make Swal global
window.Modal = Modal; // Make Modal global
console.log(Modal);
