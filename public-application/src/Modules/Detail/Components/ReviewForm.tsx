const ReviewForm = () => {
    return (
        <form action="">
            <label className="pb-2">Review</label>
            <textarea 
                className="w-full border border-black rounded focus:border-2 focus:outline-none focus:border-cimbSecondary100 p-2 text-sm"
                placeholder="Tempatnya mantap"
            >

            </textarea>
            <div className="flex pt-2">
                <div>
                ⭐
                <select name="" id="" className="py-1 px-2rounded mr-3">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                </div>
                <button className="text-sm py-2 px-4 text-white bg-cimbSecondary300 rounded">Send Review</button>
            </div>
        </form>
    )
}

export default ReviewForm