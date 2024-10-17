import React from "react"

interface ReviewProp {
    rating: number;
    review: String
}

const Review: React.FC<ReviewProp> = ({rating, review}) => {
    return (
        <div className="py-2 border-t">
            <p>⭐{rating}</p>
            <p>{review}</p>
        </div>
    )
}

export default Review