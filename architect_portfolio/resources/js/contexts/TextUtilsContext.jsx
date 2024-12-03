import React, { createContext, useContext } from 'react';

const TextUtilsContext = createContext();

export const TextUtilsProvider = ({ children }) => {
    const addLineBreakBeforeLastPreposition = (text) => {
        return text
            .replace(/(.*)\s(ve)\s(.*)$/, '$1\n$2 $3')
            .replace(/(.*)\s(v)\s(.*)$/, '$1\n$2 $3')
            .replace(/(.*)\s(za)\s(.*)$/, '$1\n$2 $3')
            .replace(/(.*)\s(na)\s(.*)$/, '$1\n$2 $3')
            .replace(/(.*)\s(u)\s(.*)$/, '$1\n$2 $3')
            .replace(/(.*)\s(s)\s(.*)$/, '$1\n$2 $3')
            .replace(/(.*)\s(sv.)\s(.*)$/, '$1\n$2 $3')
            .replace(/(.*)\s(do)\s(.*)$/, '$1\n$2 $3');

    };

    return (
        <TextUtilsContext.Provider value={{ addLineBreakBeforeLastPreposition }}>
            {children}
        </TextUtilsContext.Provider>
    );
};

export const useTextUtils = () => {
    const context = useContext(TextUtilsContext);
    if (!context) throw new Error('useTextUtils must be used within a TextUtilsProvider');
    return context;
};
