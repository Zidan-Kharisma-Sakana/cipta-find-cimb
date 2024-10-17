import HomeLayout from "../../Layout/HomeLayout";
import MapDetailContainer from "../Components/Map/index";
import SideBarDetail from "../Components/SidebarDetail";
import { useParams } from "react-router-dom";

function Detail() {
  return (
    <section className="w-full flex flex-col-reverse md:flex-row h-screen">
      <SideBarDetail/>
      <MapDetailContainer />
    </section>
  );
}
export default function DetailPage() {
  const {kacab_id} = useParams();
  console.log(kacab_id)
  return (
    <HomeLayout>
      <Detail />
    </HomeLayout>

  );
}
