interface Branch{
    "id": number,
    "name": string,
    "type": string,
    "address": string,
    "city": string,
    "province": string,
    "cp": string,
    "latitude": number,
    "longitude": number,
    "open_hour": string,
    "close_hour": string,
    "queue": number,
    "rate": number,
    "is_deleted": boolean,
    "image_path": string, 
}

export const getBranch = async (id: number | string): Promise<Branch> => {
    const response = await fetch(`http://localhost:8000/api/branches/${id}`);
    const data: Branch = (await response.json()).data
    return data
}

export const getReviews = async (id: number | string) => {
    const response = await fetch(`http://localhost:8000/api/office/${id}/review`);
    const data = (await response.json()).data
    return data
}