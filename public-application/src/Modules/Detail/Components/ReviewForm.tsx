import { useState } from "react";
import { useParams } from "react-router-dom";

interface FormData {
    rating: number;
    review: string;
}

const ReviewForm = () => {
    const [formData, setFormData] = useState<FormData>({ rating: 1, review: "" });
    // Handle input change
    const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const { name, value } = e.target;
        setFormData({
        ...formData,
        [name]: value,
        });
    };

    const {kacab_id} = useParams()

    // Handle form submit
    const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
        e.preventDefault(); // Prevent page reload
        console.log(kacab_id)
        try {
            const response = await fetch(`http://localhost:8000/api/office/${kacab_id}/review`, {
                method: 'POST',
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData), // Send form data as JSON
            });
            console.log(response)
        if (response.ok) {
            const data = await response.json();

        } else {

        }
        } catch (error) {

        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <label className="pb-2">Review</label>
            <textarea 
                className="w-full border border-black rounded focus:border-2 focus:outline-none focus:border-cimbSecondary100 p-2 text-sm"
                placeholder="Tempatnya mantap"
                onChange={handleChange}
                name="review"
            >

            </textarea>
            <div className="flex pt-2">
                <div>
                ⭐
                <select name="rating" id="" className="py-1 px-2rounded mr-3" onChange={handleChange}>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                </div>
                <button className="text-sm py-2 px-4 text-white bg-cimbSecondary300 rounded" >Send Review</button>
            </div>
        </form>
    )
}

export default ReviewForm