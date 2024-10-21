import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom'; // Import Link
import '../../css/ProjectList.css';

const ProjectList = () => {
    const [projects, setProjects] = useState([]);

    useEffect(() => {
        axios.get('api/projects')
            .then(response => {
                setProjects(response.data);
            })
            .catch(error => {
                console.error('There was an error fetching the projects!', error);
            });
    }, []);

    return (
        <div className="project-list">
            {projects.map((project) => (
                <div key={project.id} className="project-item">
                    {/* Používáme Link místo <a> */}
                    <Link to={`/projects/${project.id}`}>
                        <div className="project-image-wrapper">
                            <img
                                src={project.cover_image.replace('storage/app/public/', '/storage/')}
                                alt={project.title}
                                className="project-image"
                            />
                            <div className="overlay">
                                <div className="text">{project.title}</div>
                            </div>
                        </div>
                    </Link>
                </div>
            ))}
        </div>
    );
};

export default ProjectList;
