import axios from 'axios';

import Echo from 'laravel-echo';
import Larasocket from 'larasocket-js';


window.Echo = new Echo({
    broadcaster: Larasocket,
    token: '3707|kMeGeCwmwy4cEfO2V83Q1nX43Ii5Ik1tDTglOzT7',
});



window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

