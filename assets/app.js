/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import Vue from 'vue';

import Home from './components/Home'
import Location from './components/Location'
import Map from './components/Map'

import Nav from './components/Nav'

new Vue({
    el: '#app',
    components: { Home },

    template: '<Home/>'
});

new Vue({
    el: '#nav',
    components: { Nav },

    template: '<Nav/>'
});


// Affichage de la page d'un lieu
// new Vue({
//     el: '#location',
//     components: {Location},
//     props: ['latitude'],
//     template: '<Location/>'
// })

new Vue({
    render(h) {
        return h(Location, {
            props: {
                latitude: this.$el.getAttribute('latitude')
            }
        })
    },
    template: '<Location/>'
}).$mount('#location')

// Affichage de la map dans la page d'un lieu
// new Vue({
//     el: '#map',
//     components: {Map},
//
//     template: '<Map/>'
// })

new Vue({
    render(h) {
        return h(Map, {
            props: {
                latitude: this.$el.getAttribute('latitude-map')
            }
        })
    },
    template: '<Map/>'
}).$mount('#map')
