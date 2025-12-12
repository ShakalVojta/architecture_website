import React, { useState, useEffect } from 'react';
import axios from '../services/axios';
import '../../css/admin/ImageSorter.css';
import { DragDropContext, Droppable, Draggable } from 'react-beautiful-dnd';

const ImageSorter = ({ projectId, currentImages, onImagesUpdate }) => {
    const [images, setImages] = useState([]);

    useEffect(() => {
        if (currentImages && currentImages.length > 0) {
            setImages(currentImages);
        }
    }, [currentImages]);

    const handleDragEnd = async (result) => {
        if (!result.destination) return;

        const items = Array.from(images);
        const [reorderedItem] = items.splice(result.source.index, 1);
        items.splice(result.destination.index, 0, reorderedItem);

        const updatedItems = items.map((item, index) => ({
            ...item,
            sort_order: index
        }));

        setImages(updatedItems);

        if (onImagesUpdate) {
            onImagesUpdate(updatedItems);
        }

        try {
            await axios.post(`/api/projects/${projectId}/image-order`, {
                images: updatedItems.map(item => ({
                    id: item.id,
                    sort_order: item.sort_order
                }))
            });
        } catch (error) {
            console.error('Chyba při aktualizaci pořadí obrázků:', error);
            alert('Nepodařilo se uložit nové pořadí obrázků.');
        }
    };

    if (!images.length) return null;

    return (
        <div className="image-sorter">
            <h3>Pořadí obrázků v galerii</h3>
            <p>Přetáhněte obrázky pro změnu jejich pořadí v galerii.</p>

            <DragDropContext onDragEnd={handleDragEnd}>
                <Droppable droppableId="images" direction="horizontal">
                    {(provided) => (
                        <div
                            {...provided.droppableProps}
                            ref={provided.innerRef}
                            className="images-list"
                        >
                            {images.map((image, index) => (
                                <Draggable
                                    key={image.id}
                                    draggableId={image.id.toString()}
                                    index={index}
                                >
                                    {(provided, snapshot) => (
                                        <div
                                            ref={provided.innerRef}
                                            {...provided.draggableProps}
                                            {...provided.dragHandleProps}
                                            className={`image-item ${snapshot.isDragging ? 'dragging' : ''}`}
                                        >
                                            <img
                                                src={image.path}
                                                alt={`Obrázek ${index + 1}`}
                                                className="image-thumbnail"
                                            />
                                            <div className="order-badge">{index + 1}</div>
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

export default ImageSorter;
