# 🌟 INJESSVIEW - Premium Website

## ✨ Overview
INJESSVIEW (INVI) is a cutting-edge, professional website offering construction, technology, and media solutions. This enhanced version features modern design, smooth animations, comprehensive functionality, and a powerful admin interface.

---

## 🎯 Key Features

### 🎨 **Modern Design**
- ✅ Gradient color schemes (Purple/Blue theme)
- ✅ Smooth animations with AOS (Animate On Scroll)
- ✅ Responsive design for all devices
- ✅ Professional typography and spacing
- ✅ Hover effects and transitions
- ✅ Fixed navigation with scroll effects
- ✅ Enhanced buttons with ripple effects

### 📄 **Pages**
1. **Home** - Welcome page with vision, services, and projects
2. **About** - Company information and values
3. **Construction Works** - Live PPDA tenders with search functionality
4. **Site Diary** - Project documentation and tracking
5. **Contact** - Contact form and information
6. **Ziwilatu Project** - External link integration

### 🛠️ **Admin Interface**
- **Dashboard** - Overview and quick actions
- **Page Management** - Edit any page content
- **Media Library** - Upload and manage images
- **Settings** - Site configuration
- **User Management** - Create/delete admin users
- **Analytics** - Track website performance
- **Backup & Deployment** - Create backups and deployment guides

### ⚡ **Technical Enhancements**
- Custom CSS framework (`enhanced.css`)
- Advanced JavaScript features (`enhanced.js`)
- Table search and filtering
- Scroll to top button
- Performance monitoring
- Accessibility improvements
- SEO optimization
- Browser caching

---

## 🚀 Quick Start

### Access the Website
```
http://localhost:8000/home
```

### Access Admin Panel
```
http://localhost:8000/admin-login
```

### Clean URLs (via .htaccess)
- `/home` - Homepage
- `/about` - About page
- `/contact` - Contact page
- `/construction-works` - Tenders
- `/site-diary` - Site diary
- `/admin` - Admin login
- `/dashboard` - Admin dashboard

---

## 📁 File Structure

```
injessview/
├── css/
│   ├── bootstrap.min.css
│   ├── aos.css
│   ├── main.css
│   ├── enhanced.css ⭐ NEW
│   └── login.css
├── js/
│   ├── bootstrap.bundle.min.js
│   ├── jquery-3.3.1.min.js
│   ├── aos.js
│   ├── sweetalert.min.js
│   ├── html2pdf.min.js
│   └── enhanced.js ⭐ NEW
├── php/
│   ├── connect.php
│   ├── core.php
│   ├── login-form.php
│   ├── logout.php
│   └── site-settings.json
├── img/ - Image assets
├── fonts/ - Font files
├── backups/ - Site backups
│
├── index.php - Homepage
├── about.php ⭐ NEW
├── contact.php ⭐ NEW
├── construction-works.php - Tenders
├── site-diary.php - Site diary menu
├── nav.php - Navigation (Enhanced)
├── footer.php - Footer (Enhanced)
│
├── admin-login.php ⭐ NEW
├── admin-dashboard.php ⭐ NEW
├── admin-pages.php ⭐ NEW
├── admin-media.php ⭐ NEW
├── admin-settings.php ⭐ NEW
├── admin-users.php ⭐ NEW
├── admin-analytics.php ⭐ NEW
├── admin-backup.php ⭐ NEW
├── admin-deploy.php ⭐ NEW
│
├── .htaccess - URL rewriting
└── ADMIN_README.md - Admin documentation
```

---

## 🎨 Design System

### Color Palette
```css
Primary Gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%)
Primary: #667eea
Secondary: #764ba2
Success: #10b981
Warning: #f59e0b
Danger: #ef4444
Dark: #1f2937
Light: #f9fafb
```

### Typography
- **Headings**: System fonts with bold weights
- **Body**: Segoe UI, Roboto, sans-serif
- **Special Text**: Gradient text effects for branding

### Components
- Rounded corners (1rem default)
- Box shadows for depth
- Smooth transitions (0.3s ease)
- Hover lift effects
- Gradient buttons
- Professional cards

---

## 🔧 Technologies Used

### Frontend
- **HTML5** - Semantic markup
- **CSS3** - Custom styling + Bootstrap 5
- **JavaScript ES6** - Enhanced functionality
- **jQuery 3.3.1** - DOM manipulation
- **AOS** - Scroll animations
- **SweetAlert** - Beautiful alerts

### Backend
- **PHP 7.4+** - Server-side logic
- **MySQL** - Database (umatha_upgrade)
- **cURL** - External data fetching
- **Sessions** - Authentication

### Tools & Libraries
- **Bootstrap 5** - UI framework
- **Font Awesome** - Icons
- **html2pdf** - PDF generation

---

## ⚙️ Configuration

### Database Settings
Edit `php/connect.php`:
```php
$port = 'localhost';
$username = 'root';
$password = '';
$database = 'umatha_upgrade';
```

### Site Settings
Edit via Admin Panel → Settings or directly in `php/site-settings.json`:
```json
{
    "site_name": "Injessview",
    "site_description": "Construction works, Site Diary",
    "contact_email": "info@injessview.com",
    "maintenance_mode": 0,
    "ziwilatu_link": "https://injessview.com/ziwilatu/subscribers.php"
}
```

---

## 🎯 Features Breakdown

### 1. **Enhanced Homepage**
- Animated preloader with progress bar
- Welcome section with company mission
- Vision and mission statements
- Services showcase
- Project links (Site Sync, Site Diary, Tenders, Ziwilatu)
- Smooth scroll animations

### 2. **Construction Works Page**
- Live PPDA tenders scraping
- 6-hour caching system
- Searchable table
- Responsive design
- Download attachments
- Last updated timestamp

### 3. **Site Diary**
- Three diary types (Roads, Building, Irrigation)
- Animated menu buttons
- Easy navigation
- Professional design

### 4. **About Page**
- Company overview
- Three service pillars
- Core values showcase
- Why choose INVI section
- Call-to-action buttons

### 5. **Contact Page**
- Contact form with validation
- Company information
- Business hours
- Quick links
- Beautiful gradient design

### 6. **Admin Dashboard**
- Beautiful sidebar navigation
- Quick stats overview
- Fast action buttons
- User profile display
- Logout functionality

### 7. **Page Management**
- Direct file editing
- Syntax-highlighted code editor
- Preview functionality
- Save changes instantly
- Support for all page types

### 8. **Media Library**
- Upload images
- Grid view display
- Copy file paths
- Delete files
- File size information

### 9. **User Management**
- Create admin users
- View all users
- Delete users (with safety)
- User avatars
- Role display

### 10. **Settings Panel**
- Site configuration
- Ziwilatu link management
- Maintenance mode toggle
- Server information
- Database details

---

## 🔐 Security Features

- Session-based authentication
- SQL injection prevention (mysqli_real_escape_string)
- XSS protection (htmlentities)
- File access controls
- Admin-only routes
- Password hashing (MD5)
- CSRF protection ready

---

## 📱 Responsive Design

- **Desktop** (1200px+): Full layout with sidebars
- **Tablet** (768px - 1199px): Adapted grid
- **Mobile** (< 768px): Stacked layout, hamburger menu

---

## ⚡ Performance Optimizations

1. **Caching**
   - PPDA tenders cached for 6 hours
   - Browser cache control
   - Static asset caching

2. **Loading**
   - Lazy image loading
   - Deferred JavaScript
   - Minified CSS/JS

3. **Code Quality**
   - Debounced scroll events
   - Throttled resize handlers
   - Optimized DOM queries

---

## 🎓 Best Practices Implemented

✅ Semantic HTML5
✅ CSS Grid and Flexbox
✅ Mobile-first approach
✅ Progressive enhancement
✅ Accessibility (ARIA labels, alt texts)
✅ SEO optimization (meta tags, descriptions)
✅ Clean code structure
✅ Comments and documentation
✅ Error handling
✅ Input validation

---

## 🚀 Deployment Guide

### Local Development
```bash
cd "/Users/martininjess/Documents/Injess_View/WEBSITE /injessview"
php -S localhost:8000
```

### Production Deployment

1. **Pre-Deployment**
   - Test all features locally
   - Create backup (Admin → Backup)
   - Review all changes

2. **Upload Files**
   - Via FTP/SFTP to server
   - Or Git push to repository

3. **Configure Database**
   - Update `php/connect.php` with production credentials
   - Import database if needed

4. **Set Permissions**
   ```bash
   chmod 755 backups/
   chmod 644 php/site-settings.json
   ```

5. **Test Production**
   - Check all pages load
   - Test admin login
   - Verify database connection
   - Test Ziwilatu link

---

## 📊 Analytics Integration

Add Google Analytics to `footer.php`:
```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=YOUR-ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'YOUR-ID');
</script>
```

---

## 🎨 Customization Guide

### Change Colors
Edit `css/enhanced.css`:
```css
:root {
    --primary-color: #YOUR_COLOR;
    --secondary-color: #YOUR_COLOR;
}
```

### Add New Pages
1. Create new PHP file
2. Include nav.php and footer.php
3. Add enhanced.css
4. Add route to .htaccess
5. Update navigation in nav.php

### Modify Navigation
Edit `nav.php` to add/remove menu items

---

## 🐛 Troubleshooting

### Issue: 404 Errors
**Solution**: Check .htaccess file exists and mod_rewrite is enabled

### Issue: Ziwilatu Link Not Working
**Solution**: Verify URL in admin settings

### Issue: Admin Can't Login
**Solution**: Check database connection and users table

### Issue: Images Not Loading
**Solution**: Check file paths and permissions

### Issue: Animations Not Working
**Solution**: Ensure AOS library is loaded

---

## 📞 Support & Maintenance

### Regular Tasks
- [ ] Backup site weekly
- [ ] Update tenders data
- [ ] Monitor site performance
- [ ] Check for security updates
- [ ] Review analytics

### Updates
- Keep PHP and MySQL updated
- Update Bootstrap when needed
- Monitor for security patches

---

## 🌟 Future Enhancements

- [ ] Blog/News section
- [ ] Client testimonials
- [ ] Portfolio showcase
- [ ] Real-time chat support
- [ ] Email newsletter integration
- [ ] Multi-language support
- [ ] Dark mode toggle
- [ ] Advanced analytics dashboard
- [ ] API integrations
- [ ] Mobile app

---

## 📜 License

© 2026 Injessview. All rights reserved.

---

## 👨‍💻 Credits

**Developed By**: GitHub Copilot  
**Technology Stack**: PHP, MySQL, Bootstrap, JavaScript  
**Design**: Custom gradient theme with modern aesthetics  
**Special Thanks**: Injessview team for their vision

---

## 📧 Contact

**Website**: https://injessview.com  
**Email**: info@injessview.com  
**Location**: Blantyre, Malawi

---

**Built with ❤️ for excellence**
