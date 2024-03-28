import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

Swiper.use([ Autoplay, Navigation, Pagination ]);
window.Swiper = Swiper;
window.Navigation = Navigation;
window.Pagination = Pagination;
