import { createBrowserRouter } from "react-router-dom";
import Layout from "../src/screen/outside/Layout";
import Home from "../src/screen/outside/home/Home";
import About from "../src/screen/outside/about/About";
import Login from "../src/screen/login/Login";
import Register from "../src/screen/register/Register";
import NotFound from "../src/screen/outside/notfound/NotFound";
import DetailsLevel from "../src/screen/outside/details-level/DetailsLevel";

const router = createBrowserRouter([
    {
        path: "/",
        element: <Layout />,
        children: [
            {
                index: true,
                element: <Home />
            },
            {
                path: "/about",
                element: <About />
            },
            {
                path: "/details-level/:slug",
                element: <DetailsLevel />
            }
        ]
    },
    {
        path: "/login",
        element: <Login />
    },
    {
        path: "/register",
        element: <Register />
    },




    {
        path: "*",
        element: <NotFound />
    }

])

export default router;