import './bootstrap';

import Alpine from 'alpinejs';
import {initTE, Input, Modal, Ripple} from "tw-elements";

window.Alpine = Alpine;

Alpine.start();

initTE({Modal, Ripple, Input});
