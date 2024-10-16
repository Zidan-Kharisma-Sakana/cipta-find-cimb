import ReviewForm from "./ReviewForm"
import Review from "./Review"

const ReviewBox = () => {
    return (
        <>
            <div className="space-y-8">
                <ReviewForm/>
                <div className="border-b">
                    <Review/>
                    <Review/>
                </div>
            </div>
        </>
    )
}

export default ReviewBox