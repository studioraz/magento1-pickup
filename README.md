<div style="direction: rtl;">
  <h2 style="text-align: right;">הקדמה</h2>
  <p style="text-align: right;">
    <span>שירות </span> <a href="https://pick-ups.co.il/">PickUP</a> <span> מיועד ללקוחות </span> <a href="https://www.ups.com/content/il/he/index.jsx">UPS Israel</a> <span> שיש בבעלותם אתר מסחר אלקטרוני </span> <span>eCommerce</span>
  </p>
  <p style="text-align: right;">
    <a href="https://pick-ups.co.il/">PickUP</a> <span> הינו שירות משלוחים חכם שמאפשר לקונים לבחור נקודת איסוף עצמי מתוך רשימה קיימת הקרובה למקום מגורים או לכתובת כלשהיא. </span>
  </p>
  <p style="text-align: right;">
    <span>ניתן לצפות בדמו של המודול בכתובת <a href="http://pickups.m1.studioraz.co.il">PickUP.m1.studioraz.co.il</a>.</span>
  </p>
  <p style="text-align: right;">
    <span>המודול מיועד לבעלי חנויות שיש ברשותם אתר מבוסס מג'נטו גרסא 1. במידה ויש ברשותכם אתר מבוסס מג'נטו 2 עברו לדף ההתקנה וההדרכה של <ac:link>
        <ri:page ri:content-title="PickUP for Magento 2.x"/>
        <ac:plain-text-link-body><![CDATA[מודול PickUP  למג'נטו 2]]></ac:plain-text-link-body>
      </ac:link>.</span>
  </p>
  <h2 style="text-align: right;">תאימות גרסאות מג'נטו</h2>
  <p style="text-align: right;">המודול תואם לגירסאות 1.9+.</p>
  <h2 style="text-align: right;">התקנת המודול</h2>
  <p style="text-align: right;">התקנת המודול הינה פעולה פשוטה וכוללת את הצעדים הבאים:</p>
  <ol>
    <li style="text-align: right;">הורדת <a href="https://github.com/studioraz/magento1-ups-ship/releases/latest">הגרסא האחרונה של המודול</a>
    </li>
    <li style="text-align: right;"> חילוץ הקבצים מהקובץ המכווץ.</li>
    <li style="text-align: right;">העלאת הקבצים לשרת.</li>
    <li style="text-align: right;">וידוי התקנת המודול תעשה על ידי כניסה לממשק הניהול ומעבר למסך שיטות משלוח. <br/>בתפריט הראשי: <strong>מערכת &gt; הגדרות</strong>. בתפריט הצד תחת בלוק <strong>מכירות</strong> יש לבחור<strong> שיטות משלוח. <br/>
      </strong>במסך זה תופיע שיטת משלוח חדשה "<span>PickUP</span> Ship".<br/>
      <ac:image ac:height="250" ac:queryparams="effects=border-simple,blur-border">
        <ri:attachment ri:filename="screenshot-dev.m1ce 2017-02-14 19-06-08.png"/>
      </ac:image>
      <br/>
      <strong> </strong>
    </li>
  </ol>
  <p style="text-align: right;">
    <strong>חשוב: </strong>מומלץ לבצע את התקנת המודול על ידי מפתח. אתם מוזמנים לפנות אלינו לקבלת תמיכה ושירות (ראו בהמשך פרטי התקשרות).</p>
  <h2 style="text-align: right;">הגדרות המודול</h2>
  <p style="text-align: right;">מסך ההגדרות של שיטת המשלוח החדשה כולל את השדות הבאים:</p>
  <table class="wrapped">
    <colgroup>
      <col/>
      <col/>
      <col/>
    </colgroup>
    <tbody>
      <tr>
        <th style="text-align: right;">שדה</th>
        <th style="text-align: right;">תיאור</th>
        <th colspan="1" style="text-align: right;">ערך ברירת מחדל</th>
      </tr>
      <tr>
        <td style="text-align: right;">פעיל</td>
        <td style="text-align: right;">שדה אשר מפעיל ומכבה את שיטת המשלוח.</td>
        <td colspan="1" style="text-align: right;">כן</td>
      </tr>
      <tr>
        <td style="text-align: right;">כותרת</td>
        <td style="text-align: right;">שם שיטת המשלוח שיופיע ללקוח בדף הקופה.</td>
        <td colspan="1" style="text-align: right;">PickUP Ship</td>
      </tr>
      <tr>
        <td colspan="1" style="text-align: right;">מחיר</td>
        <td colspan="1" style="text-align: right;">המחיר שיגבה מהלקוח בעבור המשלוח.</td>
        <td colspan="1" style="text-align: right;">10</td>
      </tr>
      <tr>
        <td colspan="1" style="text-align: right;">
          <span>תחום גיאוגרפי עבור שיטת המשלוח</span>
        </td>
        <td colspan="1" style="text-align: right;">
          <span>האם לאפשר משלוח לכל הארצות או לארצות מסויימת</span>
        </td>
        <td colspan="1" style="text-align: right;">לא</td>
      </tr>
      <tr>
        <td colspan="1" style="text-align: right;">
          <span>אפשר משלוח לארצות מסוימות</span>
        </td>
        <td colspan="1" style="text-align: right;">לאילו ארצות לאפשר את המשלוח</td>
        <td colspan="1" style="text-align: right;">ללא</td>
      </tr>
    </tbody>
  </table>
  <h2 style="text-align: right;">חווית לקוח</h2>
  <p style="text-align: right;">שיטת המשלוח של PickUP תוצע ללקוח בשלב <strong>שיטות המשלוח </strong>בדף הקופה. </p>
  <p style="text-align: right;">
    <ac:image ac:height="250" ac:queryparams="effects=border-simple,blur-border">
      <ri:attachment ri:filename="screenshot-dev.m1ce 2017-02-14 19-08-08.png"/>
    </ac:image>
  </p>
  <p style="text-align: right;">בלחיצה על הכפתור ייפתח ללקוח חלון שבו הוא יכול לבחור את נקודת האיסוף המועדפת עליו.</p>
  <p style="text-align: right;">החלון יציג את נקודות האיסוף <u>הקרובות ביותר</u> לכתובת אותה הזין הלקוח בשלב <strong>כתובת למשלוח</strong>. </p>
  <p style="text-align: right;">לאחר בחירת הנקודה יוצג המידע אודות נקודת האיסוף לצד הכפתור. </p>
  <h2 style="text-align: right;">ניהול משלוחים בממשק הניהול</h2>
  <h3 style="text-align: right;">צפייה בפרטי נקודת האיסוף של הלקוח</h3>
  <p style="text-align: right;">למנהל החנות יוצגו פרטי נקודת האיסוף של PickUP במסך ההזמנה בממשק הניהול:</p>
  <p style="text-align: right;">
    <ac:image ac:queryparams="effects=border-simple,blur-border">
      <ri:attachment ri:filename="screenshot-dev.m1ce 2017-02-14 19-12-29.png"/>
    </ac:image>
  </p>
  <h3 style="text-align: right;">ייצוא קובץ עבור כלי ההדפסה UPS SmartShip™ Printing Tool</h3>
  <p style="text-align: right;">כלי להדפסת שטרי מטען ב- Bulk, לשימוש אחראי תפעול שמטפל בהזמנות של אתר e-commerce. מאפשר לשלח את הזמנות דרך UPS.</p>
  <p style="text-align: right;">הכלי מאפשר להדפיס את שטר מטען במדפסת רגילה בפורמט A4 או בפורמט 10x15cm עבור מדבקות.</p>
  <p style="text-align: right;">יש להתקין את האפליקציה במחשב המשמש להדפסת שטרי המטען. <a href="https://pick-ups.co.il/ShipPrint1.1/publish.htm">להורדת הכלי</a>.</p>
  <p style="text-align: right;">כלי ההדפסה מקבל קובץ המיוצא ממשק הניהול של המערכת.</p>
  <p style="text-align: right;">על מנת לייצא את הקובץ יש לפעול על פי הצעדים הבאים:</p>
  <ol>
    <li style="text-align: right;">כניסה לממשק הניהול ומעבר למסך <strong>מכירות &gt; הזמנות</strong>.</li>
    <li style="text-align: right;">בחירת ההזמנות שאותן מבקשים לייצא. </li>
    <li style="text-align: right;">בחירת האפשרות "<strong>ייצוא הזמנות לכלי הדפסה של PickUP</strong>"</li>
    <li style="text-align: right;">לחיצה על כפתור "<strong>שלח</strong>"</li>
  </ol>
  <p style="text-align: right;">
    <ac:image ac:height="250" ac:queryparams="effects=border-simple,blur-border">
      <ri:attachment ri:filename="screenshot- 2017-02-14 19-14-15.png"/>
    </ac:image>
  </p>
  <h3 style="text-align: right;">הזנת מספר מעקב ושליחתו ללקוח</h3>
  <p style="text-align: right;">לאחר קבלת מספרי המעקב באמצעות כלי ההדפסה ניתן להזינם במערכת ולשלוח אותו במייל ללקוח.</p>
  <p style="text-align: right;">יש לפעול על פי הצעדים הבאים:</p>
  <ol>
    <li style="text-align: right;">יש לבחור הזמנה בממשק הניהול</li>
    <li style="text-align: right;">יש ללחוץ על הכפתור שלח בסרגל הפעולות<br/>
      <ac:image ac:queryparams="effects=border-simple,blur-border">
        <ri:attachment ri:filename="screenshot-dev.m1ce 2017-01-29 13-26-58.png"/>
      </ac:image> </li>
    <li style="text-align: right;">במסך שייטען, בבלוק פרטי משלוח, ניתן להזין את קוד המעקב למשלוח<br/>
      <ac:image>
        <ri:attachment ri:filename="screenshot-dev.m1ce 2017-02-14 19-15-34.png"/>
      </ac:image> </li>
    <li style="text-align: right;">חשוב: בכדי שהמידע יישלח ללקוח יש לסמן את האפשרות "<label class="normal" for="send_email">שלח העתק תעודת משלוח (דואר אלקטרוני)</label>"<br/>
      <ac:image>
        <ri:attachment ri:filename="screenshot-dev.m1ce 2017-01-29 13-32-46.png"/>
      </ac:image>
    </li>
  </ol>
  <h2 style="text-align: right;">תמיכה ושירות</h2>
  <p style="text-align: right;">
    <span>אם אינך לקוח UPS, אנא צור קשר עם המחלקה העסקית של UPS: בטלפון: 5994* באימייל: </span>
    <a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;tf=1&amp;to=pickups@ups.co.il">PickUP@ups.co.il</a>
  </p>
  <p style="text-align: right;">במידה ואתה מעוניין בקבלת תמיכה עבור התקנת והגדרת המודול, פנה באמצעות המייל לכתובת <a href="mailto:support@studioraz.co.il">support@studioraz.co.il</a>. ציין בשדה הנושא של המייל את המילה PickUP.</p>
  <p style="text-align: right;">
    <br/>
  </p>
  <p>
    <br/>
  </p>
  <p>
    <br/>
  </p>
</div>
