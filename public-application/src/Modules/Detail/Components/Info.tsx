import React from 'react';

interface InfoProps {
    title: String;
    value: String;
}

const Info: React.FC<InfoProps> = ({title, value}) => {
    return (
        <>
            <div>
                <p className='text-sm text-gray-500'>{title}</p>
                <h3 className='font-medium'>{value}</h3>
            </div>
        </>
    )
}

export default Info;