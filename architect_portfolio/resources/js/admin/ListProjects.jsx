import React, { useEffect, useState } from 'react';
import axios from 'axios';
import '../../css/admin/ListProjects.css';
import { useNavigate } from 'react-router-dom';

const ListProjects = () => {
    const [projects, setProjects] = useState([]);
    const navigate = useNavigate();

    useEffect(() => {
        fetchProjects();
    }, []);

    const fetchProjects = () => {
        axios.get('/api/projects')
            .then(response => {
                setProjects(response.data);
            })
            .catch(error => {
                console.error("Error fetching projects:", error);
            });
    };

    const handleEdit = (projectId) => {
        navigate(`/admin/edit/${projectId}`);
    };

    const handleDelete = async (projectId) => {
        if (window.confirm('Opravdu chcete smazat tento projekt?')) {
            try {
                await axios.delete(`/api/projects/${projectId}`);
                fetchProjects();
            } catch (error) {
                console.error("Error deleting project:", error);
                alert('Došlo k chybě při mazání projektu');
            }
        }
    };

    return (
        <div className="list-projects">
            <h2>Seznam projektů</h2>
            <div className="projects-container">
                {projects.map(project => (
                    <div key={project.id} className="project-card">
                        <button
                            className="delete-button"
                            onClick={() => handleDelete(project.id)}
                        >
                            ×
                        </button>
                        <h3>{project.title}</h3>
                        <p><strong>Místo:</strong> {project.location}</p>
                        <p><strong>Datum:</strong> {project.date}</p>
                        <button
                            className="edit-button"
                            onClick={() => handleEdit(project.id)}
                        >
                            Upravit projekt
                        </button>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default ListProjects;
