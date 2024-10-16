import { useState } from "react";

import CIMB from "../../Layout/CIMB";
import SideBar from "../Components/Sidebar";
import Map from "../Components/Map";


export default function DetailPage() {
  // const tabs = ["Info", "Review"]

  // const [activeTab, setActiveTab] = useState(0)
  // const contents = [
  //   <InfoBox/>,
  //   <ReviewBox/>
  // ]


  return (
    <main>
      <div className="w-full flex justify-between fixed px-6 py-4 z-10 bg-gradient-to-r from-cimbSecondary200 to-cimbSecondary300">
        <div>
        </div>
        <CIMB />
      </div>
      <section className="w-full h-max flex justify-between pt-12 h-screen overflow-y-hidden">
        <SideBar/>
        <Map/>
      </section>
    </main>
  );
}