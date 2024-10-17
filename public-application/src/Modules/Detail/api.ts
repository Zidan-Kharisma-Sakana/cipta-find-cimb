interface Branch{
    "id": number,
    "name": String,
    "type": String,
    "address": String,
    "city": String,
    "province": String,
    "cp": String,
    "latitude": number,
    "longitude": number,
    "open_hour": String,
    "close_hour": String,
    "queue": number,
    "rate": number,
    "is_deleted": boolean,
    "image_path": String, 
}

export const getBranch = async (id: number): Promise<Branch> => {
    const response = await fetch(`http://10.10.90.13:8000/api/branches/${id}`);
    const data: Branch = (await response.json()).data
    return data
}

export const getReviews = async (id: number) => {
    const response = await fetch(`http://10.10.90.13:8000/api/office/${id}/review`);
    const data = (await response.json()).data
    return data
}