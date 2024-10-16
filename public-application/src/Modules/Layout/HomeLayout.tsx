// import CIMB from "../../assets/cimb.png";
import React from "react";

const HomeLayout: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  return (
    <main>
      <div className="w-full flex justify-between px-6 py-4 fixed border z-10 bg-white">
        <CIMB />
      </div>
      <section className="w-full">{children}</section>
    </main>
  );
};
export default HomeLayout;

const CIMB = () => {
  return (
    <svg xmlns="http://www.w3.org/2000/svg" width="132.501" height="20" viewBox="0 0 132.501 20">
      <g id="Logo_CIMB_white" data-name="Logo CIMB white" transform="translate(-68.343 -702.277)">
        <rect
          id="Rectangle_1485"
          data-name="Rectangle 1485"
          width="19.998"
          height="20"
          transform="translate(68.343 702.277)"
          fill="#fff"
        />
        <path
          id="Path_642"
          data-name="Path 642"
          d="M88.334,715.371H77.7l4.7,6.223H93.04l-4.706-6.223"
          transform="translate(-6.66 -9.316)"
          fill="#ec2428"
        />
        <path
          id="Path_643"
          data-name="Path 643"
          d="M93.04,736.938H82.408l-4.7,6.222h10.63l4.706-6.222"
          transform="translate(-6.66 -24.66)"
          fill="#76111c"
        />
        <path
          id="Path_644"
          data-name="Path 644"
          d="M201.452,719.867a3.076,3.076,0,0,0,1.53-2.666c0-2.272-1.552-3.683-4.047-3.683h-5.24v13.026h5.46c2.471,0,4.007-1.445,4.007-3.773a3.064,3.064,0,0,0-1.709-2.9m-5.128-3.99h2.411c1.012,0,1.614.535,1.614,1.434s-.6,1.431-1.614,1.431h-2.411Zm2.574,8.307h-2.574v-3.064H198.9a1.535,1.535,0,1,1,0,3.064Zm-15.439-2.345c-.1-.169-4.6-8.349-4.6-8.349h-2.573v13.027h2.631v-7.782c.194.341,4.538,7.887,4.538,7.887l4.521-7.885v7.78h2.63V713.49H188.04S183.553,721.67,183.46,721.839Zm-10.39-8.322h-2.631v13.026h2.631Zm-6.988,9.889a4.311,4.311,0,1,1,0-6.751l.04.03,1.833-1.831-.046-.038a6.868,6.868,0,0,0-4.5-1.682,6.9,6.9,0,1,0,4.5,12.114l.044-.04-1.833-1.832Z"
          transform="translate(-62.674 -7.724)"
          fill="#fff"
        />
        <path
          id="Path_645"
          data-name="Path 645"
          d="M401.311,722.619h4.35l-2.138-6.3h-.037l-2.176,6.3m1.278-7.925h1.886l4.532,12.914h-1.574l-1.233-3.476h-5.424l-1.184,3.56h-1.763l4.761-13"
          transform="translate(-234.419 -8.834)"
          fill="#fff"
        />
        <path
          id="Path_646"
          data-name="Path 646"
          d="M492.328,722.619h4.347l-2.138-6.3H494.5l-2.174,6.3m1.274-7.925h1.887l4.531,12.914h-1.574l-1.23-3.476h-5.428l-1.184,3.56h-1.76l4.758-13"
          transform="translate(-299.175 -8.834)"
          fill="#fff"
        />
        <path
          id="Path_647"
          data-name="Path 647"
          d="M452.684,716.456s-4.9-3.883-9.287.253a6.891,6.891,0,0,0-1.857,5.32,6.371,6.371,0,0,0,6.754,6,12.249,12.249,0,0,0,4.644-1.268v-6.163h-4.307v1.181h3.038v4.054s-4.473,2.111-7.006-.423c0,0-2.025-1.1-1.6-4.9,0,0,.845-4.616,5.517-4.334,0,0,2.533.309,3.208,1.408l.9-1.127"
          transform="translate(-265.516 -8.912)"
          fill="#fff"
        />
        <rect
          id="Rectangle_1486"
          data-name="Rectangle 1486"
          width="1.354"
          height="13.004"
          transform="translate(159.895 705.77)"
          fill="#fff"
        />
        <path
          id="Path_648"
          data-name="Path 648"
          d="M346.49,714.381v10.644l-7.767-10.644h-1.35v13h1.35V716.7l7.767,10.681h1.352v-13H346.49"
          transform="translate(-191.407 -8.611)"
          fill="#fff"
        />
      </g>
    </svg>
  );
};
