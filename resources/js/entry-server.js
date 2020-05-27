/* global context, dispatch */

import app from './app';
import renderVueComponentToString from 'vue-server-renderer/basic';

app.$router.push(context.url);


renderVueComponentToString(app, (err, html) => {
    if (err) {
        throw new Error(err);
    }
    dispatch(html);
});