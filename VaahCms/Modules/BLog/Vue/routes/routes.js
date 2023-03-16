let routes= [];

import dashboard from "./vue-routes-dashboard";
import blog from "./vue-routes-blogs";
import catogories from "./vue-routes-catogories";

routes = routes.concat(dashboard);
routes = routes.concat(blog);
routes = routes.concat(catogories);

export default routes;
