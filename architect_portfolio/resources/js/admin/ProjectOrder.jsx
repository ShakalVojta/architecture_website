import React, { useEffect, useState } from 'react';
import axios from 'axios';
import '../../css/admin/ProjectOrder.css';
import { DragDropContext, Droppable, Draggable } from 'react-beautiful-dnd';

const ProjectOrder = () => {
    const [projects, setProjects] = useState([]);

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

    const handleDragEnd = async (result) => {
        if (!result.destination) return;

        const items = Array.from(projects);
        const [reorderedItem] = items.splice(result.source.index, 1);
        items.splice(result.destination.index, 0, reorderedItem);

        setProjects(items);

        try {
            const updatedOrder = items.map((item, index) => ({
                id: item.id,
                sort_order: index
            }));

            await axios.post('/api/projects/reorder', { order: updatedOrder });
        } catch (error) {
            console.error('Chyba při aktualizaci pořadí:', error);
            fetchProjects();
        }
    };

    return (
        <div className="project-order">
            <h2>Pořadí projektů</h2>
            <p className="instruction">Přetažením změňte pořadí projektů na hlavní stránce</p>
            <DragDropContext onDragEnd={handleDragEnd}>
                <Droppable droppableId="projects">
                    {(provided) => (
                        <div
                            className="projects-order-list"
                            {...provided.droppableProps}
                            ref={provided.innerRef}
                        >
                            {projects.map((project, index) => (
                                <Draggable
                                    key={project.id}
                                    draggableId={project.id.toString()}
                                    index={index}
                                >
                                    {(provided, snapshot) => (
                                        <div
                                            ref={provided.innerRef}
                                            {...provided.draggableProps}
                                            className={`project-order-item ${snapshot.isDragging ? 'dragging' : ''}`}
                                        >
                                            <div
                                                {...provided.dragHandleProps}
                                                className="drag-handle"
                                            >
                                                ⋮⋮
                                            </div>
                                            <div className="project-info">
                                                <img
                                                    src={project.cover_image.replace('storage/app/public/', '/storage/')}
                                                    alt={project.title}
                                                    className="project-thumbnail"
                                                />
                                                <span className="project-title">{project.title}</span>
                                            </div>
                                        </div>
                                    )}
                                </Draggable>
                            ))}
                            {provided.placeholder}
                        </div>
                    )}
                </Droppable>
            </DragDropContext>
        </div>
    );
};

export default ProjectOrder;
