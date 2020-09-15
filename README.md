# NEW PROJECT

This is the default ProjectCLI README. Project description goes here ...

## Getting Started

### Prerequisites
To run this project, please make sure you meet all the requirements:
- [Docker](https://docs.docker.com/engine/installation/)
- [ProjectCLI](https://github.com/chriha/project-cli)

### Project Structure
```
- commands
  | Contains project specific commands (s. 'project make:command')
- conf
  | Add configuration files for project components (like nginx,
  | PHP, crontab, supervisor, etc)
- scripts
  | Contains scripts for deployment, HTTP requests and other complex tasks
- src
  | Here goes the actual application source
- temp
  | Temp directory for docker-compose service mounts
```

### Installation
Execute the following command to set up the project:
```shell
$ project clone https://github.com/chriha/project-cli-env-php.git
```

Show all available commands for this project:
```shell
$ project
```

### Configuration

#### Ports
To change ports, update the `./.env` file to your needs.

### Services

| App         | Local                 | Stage                             | Production   |
|-------------|-----------------------|-----------------------------------|--------------|
| App         | http://localhost      | -                                 | -            |
| Mailcatcher | http://localhost:1080 | -                                 | -            |
| phpMyAdmin  | http://localhost:8082 | -                                 | -            |


## Versioning
We use [SemVer](https://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags).


## Deployment
Pipelines are used for deployment.

To deploy a new version for staging, create a new branch with the `staging/` prefix. The default staging branch is called `staging/develop`. If you would like to create a specific version for stage without changing `staging/develop`'s history, name it `staging/YOUR-BRANCH-NAME`, cherry-pick your commits and push it to Git. Whenever a branch with the prefix `staging/` is pushed to Git,

Deployment to production is similar, but requires tags to be created in the following format: `vMAJOR.MINOR.PATCH`, eg `v1.8.2`. Even though tags are global, they should be created on the master's HEAD, to ensure that all necessary commits have been merged.


## Contributing
Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct, and the process for submitting pull requests to us.
