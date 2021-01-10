<?php

return [
    "logging" => collect([
        "active"   => env("GUEAPIQL_LOGGING_IS_ACTIVE_WRITING", true),
        "channels" => collect([
            "resource"   => collect([
                "name"   => env("GUEAPIQL_LOGGING_CHANNEL_RESOURCES_NAME", "GueApiQLResources"),
                "active" => env("GUEAPIQL_LOGGING_CHANNEL_RESOURCES_IS_ACTIVE_WRITING", true)
            ])
        ])
    ])
];
