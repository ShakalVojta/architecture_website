import ProjectList from "../components/ProjectList.jsx";
import '../../css/HomePage.css';
import {useEffect, useState} from "react";
import Loader from "../components/Loader.jsx";

const HomePage = () => {
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        const timer = setTimeout(() => {
            setIsLoading(false);
        }, 200);

        return () => clearTimeout(timer);
    }, []);

    return(
        isLoading ? <Loader /> : <ProjectList />
    )
};

export default HomePage;
