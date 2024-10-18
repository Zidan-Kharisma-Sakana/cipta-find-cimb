export interface Branch {
  id: number;
  name: string;
  type: string;
  address: string;
  city: string;
  province: string;
  cp: string;
  latitude: string;
  longitude: string;
  open_hour: string;
  close_hour: string;
  queue: number;
  rate: string;
  is_deleted: boolean;
  image_path: string;
  created_at: string | null;
  updated_at: string | null;
}
