# LazyLoad Video - WordPress Plugin

### 🚀 A lightweight WordPress plugin that enables **lazy loading** for `<video>` elements.

## 📌 Features
✅ Automatically converts `<video>` elements to use `data-src` for lazy loading.  
✅ Uses `IntersectionObserver` to load videos only when visible.  
✅ Includes a **fallback** for older browsers (IE11 and below).  

## 🔧 Installation
1. **Download the plugin ZIP** or clone the repository.  
2. Upload the `lazyload-video/` folder to `wp-content/plugins/`.  
3. Activate the plugin from the WordPress admin panel.  

## 🛠️ How It Works
- WordPress **video shortcodes** (`[video src="video.mp4"]`) automatically get modified to use `data-src`.  
- JavaScript detects when a video **enters the viewport** and loads it dynamically.  
- A **fallback** ensures videos load even in older browsers.  

## 💡 Usage
Simply embed a WordPress video as usual:
```html
[video src="https://example.com/video.mp4"]```
The plugin will automatically apply lazy loading to all videos.

## 📄 License
This plugin is licensed under the GPL-2.0 license.
