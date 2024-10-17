import ReviewForm from "./ReviewForm"
import Review from "./Review"
import { useEffect, useState } from "react"
import { getReviews } from "../api"
import { useParams } from "react-router-dom"

const ReviewBox = () => {
    const [reviews, setReviews] = useState([])
    const {kacab_id} = useParams()

    useEffect(() => {
        async function fetchData(){
            setReviews(await getReviews(kacab_id))
        }
        fetchData();
    },[])
    return (
        <>
            <div className="space-y-8">
                <ReviewForm/>
                <div className="border-b pb-32">
                    {
                        reviews.map((review) => <Review review={review.review} rating={review.rating} key={review.id}/>)
                    }
                </div>
            </div>
        </>
    )
}

export default ReviewBox