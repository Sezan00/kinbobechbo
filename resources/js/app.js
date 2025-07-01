import './bootstrap';
import axios from 'axios';

axios.defaults.headers.common['Accept'] = 'application/json';

window.axios = axios;