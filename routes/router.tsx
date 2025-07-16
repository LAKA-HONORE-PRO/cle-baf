import { createBrowserRouter } from "react-router-dom";
import Layout from "../src/screen/outside/Layout";
import Home from "../src/screen/outside/home/Home";
import About from "../src/screen/outside/about/About";

const router =  createBrowserRouter([
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
            }
        ]
    }
])

export default router;