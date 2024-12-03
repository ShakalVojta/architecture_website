import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import '../../css/ProjectDetails.css';
import { format } from 'date-fns';
import { cs } from 'date-fns/locale';
import ProjectCarousel from "./ProjectCarousel.jsx";

const ProjectDetails = () => {
    const { id } = useParams();
    const [project, setProject] = useState(null);

    useEffect(() => {
        axios.get(`/api/projects/${id}`)
            .then(response => {
                setProject(response.data);
            })
            .catch(error => {
                console.error('There was an error fetching the project details!', error);
            });
    }, [id]);

    const formatDate = (dateString) => {
        if (!dateString) return '';
        const date = new Date(dateString);
        return format(date, 'LLLL yyyy', { locale: cs });
    };

    if (!project) {
        return <div>Loading...</div>;
    }

    return (
        <div className="project-detail">
            <div className="project-info">
                <div className="project-details">
                    <div className="project-side-info">
                        {project.full_title && <p><strong>Název:</strong> {project.full_title}</p>}
                        {project.location && <p><strong>Místo:</strong> {project.location}</p>}
                        {project.author && <p><strong>Autor:</strong> {project.author}</p>}
                        {project.rating && <p><strong>Hodnocení:</strong> {project.rating}</p>}
                        {project.phase && <p><strong>Fáze:</strong> {project.phase}</p>}
                        {project.proposal && <p><strong>Návrh:</strong> {project.proposal}</p>}
                        {project.implementation && <p><strong>Realizace:</strong> {project.implementation}</p>}
                        {project.project_type && <p><strong>Typ projektu:</strong> {project.project_type}</p>}
                        {project.date && <p><strong>Datum:</strong> {formatDate(project.date)}</p>}
                        {project.scope_of_work && <p><strong>Rozsah prací:</strong> {project.scope_of_work}</p>}
                        {project.annotation && <p><strong>Anotace:</strong> {project.annotation}</p>}
                        {project.description && <p><strong>Popis:</strong> {project.description}</p>}
                    </div>
                    <ProjectCarousel projectId={id} />
                </div>
            </div>
        </div>
    );
};

export default ProjectDetails;
