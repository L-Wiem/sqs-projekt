import {createBrowserRouter} from "react-router-dom";
import Login from './views/Login.jsx';
import Signup from "./views/signup.jsx";
import NotFound from "./views/NotFound.jsx";

const router = createBrowserRouter([
    {
        path: '/login',
        element: <Login/>
    },
    {
        path: '/signup',
        element: <Signup/>
    },
    {
        path: '*',
        element: <NotFound/>
    },
])
export default router;

