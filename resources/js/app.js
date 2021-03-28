require('./bootstrap');
const ujs = require('@rails/ujs');
ujs.start();

// Components
require('./components/article/likes');
require('./components/article/views');
require('./components/article/comments');
