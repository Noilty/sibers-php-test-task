#SIBERS-Test
Test task from Sibers
1. [Beginning of work](#start) 
1. [Architecture description](#architecture)

<a name="start"><h2>Beginning of work</h2></a> 
1. Copy files project in root directory web-server or use OpenServer
    1. OpenServer setting
        1. Copy project by path /OpenServer/domain/{nameProject}
        1. Add domain (OpenServer/Setting/Domain): 
            1. Domain name - sibers.loc
            1. Domain folder - sibers.loc\public
1. Enter the connection parameters with the database in config/db.php
1. Test user: 
    1. root:55555 (Admin)
    1. vlads:55555 (User)

<a name="architecture"><h2>Architecture description</h2></a>
Simple MVC framework.

**folders**
- **config** : Settings file project
- **data**: Saves files project (eg file logs)
- **engine**: Main functions in project 
- **public**: Public file project
- **templates**: Templates for project