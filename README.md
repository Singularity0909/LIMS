# Library Information Management System

## Introduction

Nowadays so much data is stored and circulated electronically, a library might seem to be a slightly outdated concept. However, a huge proportion of the world's information and learning is still not available electronically, so libraries retain their importance for research and study.

Possessing millions of books and periodicals, our school library receives thousands of readers every day, which brings much workload to the library staff. Consequently, there is an urgent need to adopt a kind of digital management. And that is what we are going to develop.

Peking University Library does this well. Here is the URL of their lending rules and regulations.

https://www.lib.pku.edu.cn/portal/cn/jy/jybl/jiehuanxujie

![](https://cdn.jsdelivr.net/gh/singularity0909/cdn@latest/img/screenshot/pku-library.png)

As you can see, readers get self-service in most cases. Readers search for and order books online, and come to library to fetch books with scanning their reader cards and barcode on books. After that, they can renew books online at any time if permitted.

There are some patterns we can learn from. Library staff has no need to deal with books lending and return in person, which can be handled by the software system.

What is more, we hope that totally digital management can be realized with the help of software system. Considering of the huge workload, we divide the management into two parts. The former is in charge of books: to create, update and delete books' information, while the latter is in charge of readers: to create and delete readers' information as well as to query borrowing records, etcetera.

According to the demand analysis, we provide a diagram of the system overall function modules below.

## Overall function modules

![](https://cdn.jsdelivr.net/gh/singularity0909/cdn/img/screenshot/lims.png)

## Object-oriented demand analysis

### Class diagrams

![](http://www.plantuml.com/plantuml/png/TL91JiD03Bpd5QkUuD0VS2X5geJ4eIhY0MxMJLRTsC7sKbNGlrFIIDreGswU6Nl6pgxKG2nriQeZgBeFHN7VbRj-QXAeSS7d5K67UTs3webbei4EGfo8MgPRro4ocFEujw4CP0wIjIp1pWFonS6xkWLgS3kEVdYyCwdtOBWLFeI8EL6tM1-tACe4yPKEV2Kluqux13zkDQhtBCAdDVDHyo62beGAM16aRZSiCms4SsDw5djZdQ0zd3U1CCkr63eT-2xG8ezN2uBXm9RB5x37Y3Dm1mGDle1Xmn9GS-FRHVwt7ldIF2To-pdYCw6SryEb0pKxh5bydk8zzIX9KKh_vxzSGKt0k8XHy4MQahzKmyD--bakn-UG0PF_aEFJCrKJtI2vxr1Dn2MzGlAfYxy0)

![](http://www.plantuml.com/plantuml/png/VO_HQeKm343V-nN1nu6o_O5iNn9hrR3OI9eAO_ZlrrikObzkdtfEASdfaw5QNjbnc0nCG6bU34RIu8qaEi-O4doB_CA_W_CaKuepq5XH6kAT8wxXpfXj4RsRBGzCQGcLzBBNWgAf536neC6cv4FXymLC3FaYt94O1wu6itWi7SUhv0SjpA9_xshAzeShqSrdrtqqRTisNy_BzT_r8OvvvGS0)

![](http://www.plantuml.com/plantuml/png/xLN1Yjj03BtxAuQSsaAMzW-sMrWex26a7r3a6IKUTZnoDPeieVJVwzZ6Ey9kjb3eOTcSelUUf4XwiM-J04jkGnNm84R8i3ysOfndjE8fLZP0IcQFu93DpyhqdoJiuz5uLqOHMYpZhazx8bOQRC479MeeZbc7GD2tnLg6q4SnaAKXzd8Ua1DvPsm3yOYxgVIxzyzCxXm8xfWEFc19s0RjumuvKOJmDHwe96jYfgSxeiTKmeoIEIxWXC2skITUIOYuLgOZbWTA2ktWVEyZzj2lQRcR8TE0QttSlBeTMqOGd9UZYorWXm5Nu1OY7F4B21w9FQPoUwCtN_d-fY4NvHIXThX2_CZ8vxl1y_raUxJ4hbpbjzmXv_HtV_Gt4_xNAorwVRxOtITX45gqNEDrPysNBhZCVSq0FjNncY76SwhhvphurA02BPqquACm5Hxfs5kSJI8a4EO8Jk03r44r3cH1FCLvakbKvvVih4P_mEXwGkTadLHFeGD14p3ATv1dm6NiOrLqFxnH_gtiM0FTM7kuqkRZpSs7pNQxtNowV9a7hgRtTGyhlfZlccJ-jLMHq2j7sQYf2k6IrAyqtUD5YPf4FzwNmf6kvaTNBoXOrUIF8jsYkiNeSXj-0m00)

### Usecase diagrams

![](http://www.plantuml.com/plantuml/png/SoWkIImgAStDuGejJYrIiAdHrLK8IarCIIr24d1CoStCoomkAKeioI_YGkP15LWvvUTd5qFKMM5L034JdvBWqeBKej9YeCKEgNafG1S10000)

![](http://www.plantuml.com/plantuml/png/bT11QiCm48NXlKxnoA8qY_W09PZG4vJa15Dfx0ZB6dSqmeJIkxTEIg24BhmJulyqWmx5IAsEoINk32RGs9yD8IfxYv8TUHF5aIcmkZB4F97IY8dyG3sVx98OIqkvJ-pk9snUHLNc9-MFoiKs-7G0VX_2xZfcr-BvRxPTeeTBD7LgVjeJa_epEb6yYmnbYnVizp7xL0ENjlq71vdpme-SULubhriszorNsUL3RrEjQbv5RsmIDIGfQzGRNT35p0_aonquXpgcRm00)

![](http://www.plantuml.com/plantuml/png/TOwz3i8m38JtFCMf4moyG0TKiRFG9p2jgQ8cJkKa0qAyEwKgHVnqiy-VxwwAYJHbxmmrAIZgFB3co3hlvI64Fe9QRwLyQIUcbdLHOszb82MFWPgUEgxJrJ6KcqJIEJRBXE98CWAmSWdgATaW1Mu6m3iPkpqsCtT-fc-d-qUJNsRTGwUsC_7L_H-txZJzZC3TL2njzku1)

![](http://www.plantuml.com/plantuml/png/bOx1IWCn48RlUOgVdlImVO2bB4MzUYe-mBWPrx3994mcY8ZlRbEaMgW7RydmVV__xwkHMalHHNunM8Q6vTNWW_9i8OkZsRBYq0fhgwpV__4kvxM2V0eokhe6AQIKK6XUQU63lKT6Zo1P8hlp2vj7aYE0v-vlyE40_AHZEDKF4sv-SxUTkkp4q0TV1ozFsFhy9jiZ-LGysVayOhSBCiVckKxJLV4qffltolyp-xWkFd3aFyLFjsVnBSKl)

![](http://www.plantuml.com/plantuml/png/dOxDIWCn58NtUOf3LxgOFi1GXe9kNMZn0QwJOmpD9CFD3LB4TzTHyQUYY-xkFNpdPrjDrDgKNEAzmGeqXWU3ZyhHOibEHYkANPkfhL8__lw6ugaLugUOUrVtCS-YCc6MSI-1EpiaOWcH71BTvuNLbMG9XBudhF3a07mre7kRq0qu-qcUBznnCxfb-5_miOZr-fMydRtODx77PXFpc9fd7OP_Z1VAquoNJ3p9UDse1zmLrV8OSu1oBEf_9poxBRDlKte1)

![](http://www.plantuml.com/plantuml/png/bSsn2i8m4CRnFKznTDAXVG0ffQ2hK_41ZkIieKaQBXT4n7UtxM1HT70B7_zVhas2BDaxXLf6XYv7ufo8LHfiYCZe8Q8UiATERew0IGk6tf5wlQ0uOfW2GEDjI0NS5G2iNq79jhz8sS3cBTpEsUS6bHclePhQKpGewxw3khP1ksmeDSrtkjoPxPxfN-lelD03EVfD7wgbOB9tJm00)

### State diagrams

![](http://www.plantuml.com/plantuml/png/ZP0_2y8m4CNtV8gRXNu11waYk3ZfA0x57EsXpPNxC_Zj3SsGeXrS0k-ztml9QzKwCHzVOQ28WEDaRuYe3w79Y5EuRUxGD3iuEQg5-Ppr1Rk80biuSqyf55d94h0lA_iuKY8rwOnhS-ckNl0B79YVEjkPEkQ8Kk-ammfQtlKdVFK9nHNbYwnVo6k45bFCWtq0)

![](http://www.plantuml.com/plantuml/png/ZP31IiD048Rl-nHx5le27gGs8XGzb1Jq81x6p4YM9ZDXTfQIjpT47BQKWjTlFdR__zzc0xKo3g5FI976oUQ8b3jDaoNXy77t6JURXzWI86cyZsym90IZy4lMuv50k_vPT2TooekqvwdO2yrdKSorkHDLEVzfnmwu0SL7naQGQh4bAyh_49kUkjE1D0l3iETl2LTazTwJzLBiYRviUV00ymsl9IOFw6LlkPEelKg-S2_NMCLbnU3LA-OjAtRrbL-g2iwgk8uybQCjCPPn-040)

![](http://www.plantuml.com/plantuml/png/ZP7DIiKm48NtUOgiXVi2BgHQ4OgWYw8RSH6QqGRp4oO9fMzl0YLaCDYxo29pldDc9Xb251YJqMnL4ZWO7tSk8IoeV5JEie-RJtwvtF47vtx2lJJAlkASF60AWFoMlmkjf8Z0-a2nZWWP6FFvTgWWPDTaVOeli1t5VR9Vxf-4Do-x2LVQ7q53Qp-TjUZjcEL-qcC6WSlwv91uds7V7Ch0gDmiHV3QX-9rYGDdxC-J5Y9_5SkXVQ7OkqApSQsHzYIyeZINrWQmCXdz2m00)

![](http://www.plantuml.com/plantuml/png/VP3BIiOm48NtUOgiXRw02waNX28ejkX6N8JEqGPo2PE4qhUtKObeuxyzytrp9kbZKfooDMBH10aRqYO9SMOTalPEl9ozogwxa2CKWUCbMUqUUCe1d2DOdijdPJIf1F4VKlHhnevy4xiqk93JFTQlP71l_gG-GV6yt7h-i-4Es-gPeZW0nNeAT2pzQMnBDp2eKXjvpE3joZFxLRlt4VFd2QA-iOBxvxKtbC6lwsfQwezfix5EUpZArdm0)

![](http://www.plantuml.com/plantuml/png/RO_DYi8m58NtUOgi1_e2inWwA48Ht1JTY8lGUwI1_8IRXDAtjnLIQUlsk-Sx9wbZKfooDQBN10aRqYW9iMCTalPEt7yUigh-P9i3E4Um_9KtPJIf1F61S-J0cE0_MUtYb6fSoEc2uGqQz_IRU0l5NN_ol3RE60VF5CNsFZlNGBk9fV-hSOH1COHOdbZEq_TsMk6hiGBdlXsiuIXRym80)

## Structural demand analysis

### Data dictionary

#### Data items

| Number | Name         | Meaning                                             | Type             | Length |
| ------ | ------------ | --------------------------------------------------- | ---------------- | ------ |
| 1      | UserID       | To identify a user                                  | Character string | 15     |
| 2      | UserName     | A user's personal name                              | Character string | 20     |
| 3      | Password     | Secret word for a user to login                     | Character string | 255    |
| 4      | Email        | A user's email address                              | Character string | 255    |
| 5      | Phone        | A user's phone number                               | Character string | 11     |
| 6      | Debt         | A user's fine for overdue borrowing or losing books | Decimal          | 10     |
| 7      | Authority    | A user's authority to access the system             | Integer          | 1      |
| 8      | BookID       | To identify a book                                  | Integer          | 10     |
| 9      | ISBN         | A book's International Standard Book Number         | Character string | 17     |
| 10     | Title        | A book's title                                      | Character string | 20     |
| 11     | Author       | Name of a book's author                             | Character string | 20     |
| 12     | Publisher    | Name of a book's publisher                          | Character string | 20     |
| 13     | Cover        | URL of a book's cover picture                       | Character string | 255    |
| 14     | Intro        | A book's introduction                               | Character string | 255    |
| 15     | Price        | A book's price                                      | Decimal          | 10     |
| 16     | Total        | Total quantity of a book                            | Integer          | 10     |
| 17     | Available    | Available quantity of a book                        | Integer          | 10     |
| 18     | Location     | A book's location in the library                    | Character string | 20     |
| 19     | CategoryID   | To identify a category of books                     | Integer          | 10     |
| 20     | CategoryName | Name of a category of books                         | Character string | 10     |
| 21     | Lent_at      | Date and time when a user borrow a book             | Timestamp        |        |
| 22     | Due_at       | Due time when a user need to return a book          | Timestamp        |        |
| 23     | Returned_at  | Date and time when a user return a book             | Timestamp        |        |

#### Data structures

| Number | Name | Meaning          | Composition                                                  |
| ------ | ---- | ---------------- | ------------------------------------------------------------ |
| 1      | User | To define a user | UserID + UserName + Password + Email + Phone + Debt + Authority |
| 2      | Book | To define a book | BookID + ISBN + Title  + Author + Publisher + Cover + Intro + Price + Total + Available + Location + CategoryID + CategoryName |

#### Data flows

| Number | Name                  | Source                      | Destination        | Composition                                                  |
| ------ | --------------------- | --------------------------- | ------------------ | ------------------------------------------------------------ |
| 1      | Books' base info      | Reader, Books admin         | Search for books   | Title + CategoryName                                         |
| 2      | Books' detailed info  | [Books]                     | Search for books   | BookID + ISBN + Title  + Author + Publisher + Cover + Intro + Price + Total + Available + Location + CategoryID + CategoryName |
| 3      | Borrowing info        | Reader                      | Borrow books       | UserID + BookID + Lent_at + Due_at                           |
| 4      | Returning info        | Reader                      | Return books       | UserID + BookID + Lent_at + Returned_at                      |
| 5      | Renewing info         | Reader                      | Renew books        | UserID + BookID + Lent_at + Due_at                           |
| 6      | Payment info          | Reader                      | Pay fine           | UserID + Debt                                                |
| 7      | New books info        | Books admin                 | Create books       | BookID + ISBN + Title  + Author + Publisher + Cover + Intro + Price + Total + Available + Location + CategoryID |
| 8      | Books update info     | Books admin                 | Update books       | BookID + ISBN + Title  + Author + Publisher + Cover + Intro + Price + Total + Available + Location + CategoryID |
| 9      | Books deletion info   | Books admin                 | Delete books       | BookID                                                       |
| 10     | Readers basic info    | Readers admin               | Search for readers | UserID + UserName                                            |
| 11     | Readers detailed info | [Users], [Lent], [Returned] | Search for readers | UserID + UserName + + Email + Phone + Debt + BookID + Lent_at + Due_at + Returned_at |
| 12     | New readers info      | Readers admin               | Create readers     | UserID + UserName + Password + Email + Phone                 |
| 13     | Readers update info   | Readers admin               | Update readers     | UserID + UserName + Password + Email + Phone                 |
| 14     | Readers deletion info | Readers admin               | Delete readers     | UserID                                                       |
| 15     | Admins basic info     | Superuser                   | Search for admins  | UserID + UserName                                            |
| 16     | Admins detailed info  | [Users]                     | Search for admins  | UserID + UserName + + Email + Phone                          |
| 17     | New admins info       | Superuser                   | Create admins      | UserID + UserName + Password + Email + Phone + authority     |
| 18     | Admins update info    | Superuser                   | Update admins      | UserID + UserName + Password + Email + Phone + authority     |
| 19     | Admins deletion info  | Superuser                   | Delete admins      | UserID                                                       |

#### Data storages

| Number | Name     | Meaning                                    | Inflows                                             | Outflows                                    |
| ------ | -------- | ------------------------------------------ | --------------------------------------------------- | ------------------------------------------- |
| 1      | Books    | To storage information of books            | Books basic info                                    | Books detailed info                         |
| 2      | Users    | To storage information of users            | Readers basic info, Admins basic info, Payment info | Readers detailed info, Admins detailed info |
| 3      | Lent     | To storage information of books' lending   | Borrowing info                                      | Readers detailed info                       |
| 4      | Returned | To storage information of books' returning | Returning info                                      | Readers detailed info                       |

#### Data processes



### Data flow diagrams

#### Top level

![](https://cdn.jsdelivr.net/gh/singularity0909/cdn@latest/img/screenshot/lims-dfd-0.png)

#### Level 1

![](https://cdn.jsdelivr.net/gh/singularity0909/cdn@latest/img/screenshot/lims-dfd-1.png)

#### Level 2

![](https://cdn.jsdelivr.net/gh/singularity0909/cdn@latest/img/screenshot/lims-dfd-2-1.png)

![](https://cdn.jsdelivr.net/gh/singularity0909/cdn@latest/img/screenshot/lims-dfd-2-2.png)

![](https://cdn.jsdelivr.net/gh/singularity0909/cdn@latest/img/screenshot/lims-dfd-2-3.png)

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

