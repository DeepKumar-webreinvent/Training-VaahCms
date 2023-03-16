let routes= [];
let routes_list= [];

import List from '../pages/catogories/List.vue'
import Form from '../pages/catogories/Form.vue'
import Item from '../pages/catogories/Item.vue'

routes_list = {

    path: '/catogories',
    name: 'catogories.index',
    component: List,
    props: true,
    children:[
        {
            path: 'form/:id?',
            name: 'catogories.form',
            component: Form,
            props: true,
        },
        {
            path: 'view/:id?',
            name: 'catogories.view',
            component: Item,
            props: true,
        }
    ]
};

routes.push(routes_list);

export default routes;

