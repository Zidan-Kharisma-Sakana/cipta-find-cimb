import HomeLayout from "../../Layout/HomeLayout";
import MapDetailContainer from "../Components/Map/index";
import SideBarDetail from "../Components/SidebarDetail";

function Detail() {
  return (
    <section className="w-full flex flex-col-reverse md:flex-row h-screen">
      <SideBarDetail data={null} />
      <MapDetailContainer />
    </section>
  );
}
export default function DetailPage() {
  return (
    <HomeLayout>
      <Detail />
    </HomeLayout>

  );
}
