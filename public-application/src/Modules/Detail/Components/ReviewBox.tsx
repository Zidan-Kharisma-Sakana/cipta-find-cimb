import ReviewForm from "./ReviewForm"
import Review from "./Review"

const ReviewBox = () => {
    const data = [
        {"rating": 4, review: "lorem"},
        {"rating": 5, review: "lorem"},
        {"rating": 2, review: "lorem"}
    ]
    return (
        <>
            <div className="space-y-8">
                <ReviewForm/>
                <div className="border-b pb-32">
                    {
                        data.map((data) => <Review review={data.review} rating={data.rating}/>)
                    }
                </div>
            </div>
        </>
    )
}

export default ReviewBox